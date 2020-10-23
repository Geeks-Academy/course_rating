import React from 'react';
import TextArea from 'components/atoms/TextArea';
import { fireEvent, render } from '@testing-library/react';

const renderTextArea = () => {
  const utils = render(<TextArea name="textarea" id="textarea" htmlFor="textarea" />);
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
      <TextArea name="textarea" id="textarea" htmlFor="textarea" placeholder="Type something..." />,
    );
    expect(getByPlaceholderText(/something/i)).toBeInTheDocument();
  });
  test('render with label', () => {
    const { getByLabelText } = render(
      <TextArea name="textarea" id="textarea" htmlFor="textarea" label="Example TextArea" />,
    );
    expect(getByLabelText(/Example/i)).toBeInTheDocument();
  });
  test('working with onChange event', () => {
    const { textarea } = renderTextArea();
    const exampleValue = 'testing value';
    fireEvent.change(textarea, { target: { value: exampleValue } });
    expect((textarea as HTMLInputElement).value).toBe(exampleValue);
  });
});
