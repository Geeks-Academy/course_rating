export const parameters = {
  actions: { argTypesRegex: '^on[A-Z].*' },
};

import React from 'react';
import { addDecorator } from '@storybook/react';

addDecorator((story) => <>{story()}</>);
