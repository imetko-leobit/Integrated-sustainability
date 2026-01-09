export class BlockEmptyMessage {
  minBlockHeight = 10;

  resizeObserver = null;

  initialize() {
    this.resizeObserver = new ResizeObserver((entries) =>
      this.onBlockResize(entries),
    );

    document.addEventListener('DOMContentLoaded', () => {
      if (!this.inEditor()) {
        return;
      }

      this.observeBlockChanges();
    });
  }

  onBlockResize(entries) {
    for (const entry of entries) {
      const block = entry.target;
      const isEmpty = this.isEmpty(block);

      if (isEmpty) {
        if (!this.hasMessage(block)) {
          const message = this.createMessage(block);

          this.addMessageToBlock(block, message);
        }
      } else if (this.hasMessage(block)) {
        this.removeMessageFromBlock(block);
      }
    }
  }


  inEditor() {
    const blockContainer = document.querySelector('.block-editor__container');

    return Boolean(blockContainer);
  }

  observeBlockChanges() {
    const blockContainer = document.querySelector('.block-editor__container');
    const observerOptions = {
      childList: true,
      subtree: true,
    };
    const observer = new MutationObserver(() =>
      this.addBlockListeners(blockContainer),
    );

    observer.observe(blockContainer, observerOptions);
  }

  addBlockListeners(blockContainer) {
    const blocks = blockContainer.querySelectorAll('.acf-block-preview');

    for (const block of blocks) {
      this.addBlockListener(block);
    }
  }

  addBlockListener(block) {
    this.resizeObserver.unobserve(block);
    this.resizeObserver.observe(block);
  }

  isEmpty(block) {
    if (this.hasMessage(block)) {
      const message = this.queryMessage(block);
      const messageHeight = message.clientHeight;
      const style = getComputedStyle(message);
      const marginBottom = Number.parseInt(style?.marginBottom || 0, 10);
      const marginTop = Number.parseInt(style?.marginTop || 0, 10);
      const margin = marginBottom + marginTop;

      return block.clientHeight <= messageHeight + margin;
    }

    return block.clientHeight < this.minBlockHeight;
  }

  createMessage(block) {
    const wrapper = document.createElement('div');
    const notice = document.createElement('section');
    const message = document.createElement('p');
    const title = this.blockTitle(block);

    message.innerHTML = `${title} is empty. Edit the content on the sidebar.`;
    notice.classList.add('notice', 'notice-info');
    notice.prepend(message);
    wrapper.classList.add('empty-block');
    wrapper.prepend(notice);

    return wrapper;
  }

  blockTitle(block) {
    const defaultTitle = 'Block';

    if (!block) {
      return defaultTitle;
    }

    // find parent
    const parent = block.closest('.wp-block');

    if (!parent) {
      return defaultTitle;
    }

    const title = parent.dataset.title;

    return title ? title + ' block' : defaultTitle;
  }

  addMessageToBlock(block, message) {
    block.prepend(message);
  }

  queryMessage(block) {
    return block.querySelector('.empty-block');
  }

  hasMessage(block) {
    const message = this.queryMessage(block);

    return Boolean(message);
  }

  removeMessageFromBlock(block) {
    const message = this.queryMessage(block);

    if (!message) {
      return;
    }

    message.remove();
  }
}
