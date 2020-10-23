import React from 'react';
import TextArea from 'components/atoms/TextArea';
import { fireEvent, render } from '@testing-library/react';

const requiredProps = {
  name: 'textarea',
};

const renderTextArea = () => {
  const utils = render(<TextArea {...requiredProps} />);
  const textarea = utils.getByTestId('textarea');
  return {
    textarea,
    ...utils,
  };
};

describe('TextArea Component', () => {
  test('render default textarea', () => {
    const { textarea } = renderTextArea();
    expect(textarea).toBeInTheDocument();
  });
  test('render with placeholder', () => {
    const { getByPlaceholderText } = render(
      <TextArea {...requiredProps} placeholder="Type something..." />,
    );
    expect(getByPlaceholderText(/something/i)).toBeInTheDocument();
  });
  test('render with label', () => {
    const { getByLabelText } = render(
      <TextArea {...requiredProps} id="textarea" htmlFor="textarea" label="Example TextArea" />,
    );
    expect(getByLabelText(/Example/i)).toBeInTheDocument();
  });
  test('working with onChange event', () => {
    const { textarea } = renderTextArea();
    const firstExampleValue = 'first testing value';
    const secondExampleValue = 'second testing value';

    fireEvent.change(textarea, { target: { value: firstExampleValue } });
    expect((textarea as HTMLInputElement).value).toBe(firstExampleValue);

    fireEvent.change(textarea, { target: { value: secondExampleValue } });
    expect((textarea as HTMLInputElement).value).toBe(secondExampleValue);
  });
});
