import React from 'react';
import ExampleStorybook from './ExampleStorybook';
import { IExampleStorybook } from './ExampleStorybook.model';

export default {
  title: 'atoms/ExampleStorybook',
  component: ExampleStorybook,
  args: {
    border: false,
  },
  argTypes: {
    border: {
      control: {
        type: 'select',
        options: [true, false],
      },
    },
  },
};

export const Default = ({ border }: IExampleStorybook) => <ExampleStorybook border={border} />;

export const WithBorder = () => <ExampleStorybook border />;
