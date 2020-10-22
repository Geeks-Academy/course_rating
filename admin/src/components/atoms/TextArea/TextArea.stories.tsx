import React from 'react';
import { Meta } from '@storybook/react/types-6-0';
import TextArea from './TextArea';
import { IProps } from './TextArea.model';

export default {
  title: 'atoms/TextArea',
  component: TextArea,
  argTypes: {
    placeholder: {
      defaultValue: 'Type something...',
      type: 'string',
    },
    name: {
      defaultValue: 'Textarea',
      type: 'string',
    },
    id: {
      defaultValue: 'Textarea',
      type: 'string',
    },
    htmlFor: {
      defaultValue: 'Textarea',
      type: 'string',
    },
  },
  className: {
    control: {
      disable: true,
    },
  },
} as Meta;

export const Default = ({ placeholder, name, id, htmlFor }: IProps): JSX.Element => (
  <TextArea
    placeholder={placeholder}
    name={name}
    id={id}
    htmlFor={htmlFor}
    label="Example TextArea"
  />
);

export const TextAreaWithoutLabel = ({ placeholder, name, id, htmlFor }: IProps): JSX.Element => (
  <TextArea placeholder={placeholder} name={name} id={id} htmlFor={htmlFor} />
);
