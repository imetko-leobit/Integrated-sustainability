import { BlockEmptyMessage } from './modules/BlockEmptyMessage';

const features = [
  new BlockEmptyMessage(),
];

for (const feature of features) {
  feature.initialize();
}

