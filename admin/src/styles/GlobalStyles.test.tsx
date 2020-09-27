import React from 'react';
import { render } from '@testing-library/react';
import GlobalStyles from './GlobalStyles';

describe('GlobalStyles', () => {
  test('render GlobalStyles has box-sizing set', () => {
    const { container } = render(<GlobalStyles />);
    expect(container).toHaveStyle('box-sizing: border-box');
  });
});