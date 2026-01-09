<?php
$acc_items = [
    [
        'title' => 'advancing water reuse in the caribbean',
        'desc' => 'In 2025, Integrated Sustainability launched a comprehensive, region-wide water reuse infrastructure initiative across several Caribbean nations. This project was designed to address critical water security challenges by implementing advanced treatment systems that support long-term, climate-resilient development.',
        'desc2' => 'By partnering with local governments, NGOs, and engineering stakeholders, the initiative aims to reduce dependence on freshwater sources, mitigate the impacts of drought and saltwater intrusion, and empower communities with sustainable, decentralized water solutions tailored to their unique environmental conditions.',
    ],
    [
        'title' => "award finalist: canada's top 100 small and medium employers",
        'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
    ],
    [
        'title' => "Develop integrated water management plans to ensure compliance and operational reliability.",
        'desc' => 'Description.',
    ],
    [
        'title' => "Employing an owner-mindset enables us to look beyond our own role to what the project, client, and community needs to succeed",
        'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
    ],
    [
        'title' => 'maven water and environment joins the integrated sustainability group',
        'list' => ['Uncertain discharge quality requirements or reporting thresholds', 'New permitting expectations tied to production changes or site expansions', 'Need for clearer monitoring strategies to support compliance confidence', 'Limited alignment between operational behaviour and regulatory commitments', 'Preparing systems and reporting structures for audits, reviews, or regulatory updates'],
    ],
    [
        'title' => '4th annual environmental, social and governance report released',
        'desc' => "We're all stakeholders of our future resources. Employing an owner-mindset enables us to look beyond our own role to what the project, client, and community needs to succeed.",
        'button' => ['button_name' => 'Explore Advocacy', 'button_link' => '#']
    ],
    [
      'title' => "Management plans to ensure compliance and operational reliability",
      'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
  ],
  [
    'title' => "tiitle 6",
    'desc' => 'Develop integrated water management plans to ensure compliance and operational reliability.',
],
];
?>

<link rel="stylesheet" href="../assets/css/components-accordion_scroll.css" />

<div class="accordion-scroll" id="scrollContainer">
  <?php foreach ($acc_items as $index => $item): ?>
  <div class="item" id="item-<?= $index ?>">
    <div class="arrow-container">
      <button class="nav-btn" onclick="toggleItem(<?= $index ?>)">
        <span class="icon"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M0.548316 15.8716L16 16C15.9627 12.1306 15.909 4.41732 15.8716 0.548268L13.9369 0.515595C13.9719 3.99757 14 8.61815 14.0373 12.6838L1.35357 0L0 1.35357L12.6837 14.0373L0.524554 13.9277L0.545558 15.8717L0.548316 15.8716Z"
              fill="white" />
          </svg></span>
      </button>
    </div>

    <div class="content-wrap">
      <div class="title" onclick="toggleItem(<?= $index ?>)">
        <?= htmlspecialchars($item['title']) ?>
      </div>
      <div class="desc-box">
        <?php if (isset($item['desc'])): ?><p><?= htmlspecialchars($item['desc']) ?></p><?php endif; ?>
        <?php if (isset($item['desc2'])): ?><p><?= htmlspecialchars($item['desc2']) ?></p><?php endif; ?>

        <?php if (isset($item['list'])): ?>
        <ul>
          <?php foreach ($item['list'] as $li): ?><li><?= htmlspecialchars($li) ?></li><?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <?php if (isset($item['button'])): ?>
        <a href="<?= $item['button']['button_link'] ?>" class="btn btn--gradient">
          <?= $item['button']['button_name'] ?>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<script>
const container = document.getElementById('scrollContainer');
const allItems = document.querySelectorAll('.item');

function toggleItem(index) {
  const targetItem = document.getElementById('item-' + index);
  const isOpen = targetItem.classList.contains('is-open');

  const ARROW_DOWN = `
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M0.548316 15.8716L16 16C15.9627 12.1306 15.909 4.41732 15.8716 0.548268L13.9369 0.515595C13.9719 3.99757 14 8.61815 14.0373 12.6838L1.35357 0L0 1.35357L12.6837 14.0373L0.524554 13.9277L0.545558 15.8717L0.548316 15.8716Z" fill="white" />
</svg>`;

  const ARROW_UP = `
<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M15.8716 15.4517L16 0C12.1306 0.0373402 4.41732 0.0910145 0.548268 0.128355L0.515595 2.06306C3.99757 2.02805 8.61815 2.00004 12.6838 1.9627L0 14.6464L1.35357 16L14.0373 3.31627L13.9277 15.4754L15.8717 15.4544L15.8716 15.4517Z" fill="#040404" />
</svg>`;

  // Close all
  allItems.forEach((item) => {
    item.classList.remove('is-open');
    item.querySelector('.icon').innerHTML = ARROW_DOWN;
  });

  // Open current
  if (!isOpen) {
    targetItem.classList.add('is-open');
    targetItem.querySelector('.icon').innerHTML = ARROW_UP;
  }
}

// Activation on scroll
// container.addEventListener('scroll', () => {
//   allItems.forEach((item, i) => {
//     const rect = item.getBoundingClientRect();
//     const containerRect = container.getBoundingClientRect();
//     if (rect.top >= containerRect.top - 20 && rect.top <= containerRect.top + 100) {
//       if (!item.classList.contains('is-open')) {
//         setActiveScroll(i);
//       }
//     }
//   });
// });

function setActiveScroll(index) {
  allItems.forEach((item, i) => {
    if (i === index) {
      item.classList.add('is-open');
      item.querySelector('.icon').innerHTML = ARROW_UP;
    } else {
      item.classList.remove('is-open');
      item.querySelector('.icon').innerHTML = ARROW_DOWN;
    }
  });
}
</script>