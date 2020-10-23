import React, { useState } from 'react';
import { StyledContainer, StyledLabel, StyledTextArea } from './TextArea.styled';
import { IProps } from './TextArea.model';

const TextArea = ({
  className,
  placeholder = 'Type something...',
  name,
  id,
  htmlFor,
  label,
}: IProps): JSX.Element => {
  const [value, setValue] = useState<string>('');
  const renderLabel = () => label && <StyledLabel htmlFor={htmlFor}>{label}</StyledLabel>;
  return (
    <StyledContainer>
      {renderLabel()}
      <StyledTextArea
        className={className}
        data-testid="textarea"
        placeholder={placeholder}
        name={name}
        id={id}
        value={value}
        onChange={({ target }: React.ChangeEvent<HTMLTextAreaElement>): void =>
          setValue(target.value)
        }
      />
    </StyledContainer>
  );
};

export default TextArea;
