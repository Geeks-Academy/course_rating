import React from 'react';
import Button from 'components/atoms/Button';
import { render } from '@testing-library/react';

describe('Button Component', () => {
  test('default button render', () => {
    const { getByTestId } = render(<Button>Click</Button>);
    expect(getByTestId('fill')).toBeInTheDocument();
  });

  test('render button with text', () => {
    const { getByText, getByTestId } = render(<Button>Click</Button>);
    expect(getByText('Click')).toHaveTextContent(/click/i);
    expect(getByTestId('fill')).toBeInTheDocument();
  });

  test('render button with particular type', () => {
    const { queryByTestId, rerender } = render(<Button type="outline">Click</Button>);
    expect(queryByTestId('outline')).toBeInTheDocument();

    rerender(<Button type="disabled">Click</Button>);
    expect(queryByTestId('disabled')).toBeInTheDocument();

    rerender(<Button type="transparent">Click</Button>);
    expect(queryByTestId('transparent')).toBeInTheDocument();

    rerender(<Button type="fill">Click</Button>);
    expect(queryByTestId('fill')).toBeInTheDocument();
  });
});
