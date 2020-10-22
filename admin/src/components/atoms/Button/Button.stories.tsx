import React from 'react';
import Button from './Button';
import { IButton } from './Button.model';

export default {
  title: 'atoms/Buttton',
  component: Button,
  args: {
    children: 'Click',
    iconPos: null,
  },
  argTypes: {
    children: {
      control: {
        type: 'text',
      },
    },
    type: {
      control: {
        type: 'select',
        options: ['fill', 'outline', 'disabled', 'transparent'],
      },
    },
    className: {
      control: {
        disable: true,
      },
    },
  },
};

export const Default = ({ children, type }: IButton): JSX.Element => (
  <Button type={type}>{children}</Button>
);

export const Fill = ({ children }: IButton): JSX.Element => <Button type="fill">{children}</Button>;

export const Outline = ({ children }: IButton): JSX.Element => (
  <Button type="outline">{children}</Button>
);

export const Disabled = ({ children }: IButton): JSX.Element => (
  <Button type="disabled">{children}</Button>
);

export const Transparent = ({ children }: IButton): JSX.Element => (
  <Button type="transparent">{children}</Button>
);
