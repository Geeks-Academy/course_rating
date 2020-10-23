import React from 'react';
import { IButton } from './Button.model';
import { DisableButton, FillButton, OutlineButton, TransparentButton } from './Button.styled';

const Button = ({ children, className, type }: IButton): JSX.Element => {
  const content = () => {
    return <span>{children}</span>;
  };
  switch (type) {
    case 'outline':
      return (
        <OutlineButton data-testid="outline" className={className}>
          {content()}
        </OutlineButton>
      );
    case 'disabled':
      return (
        <DisableButton data-testid="disabled" className={className}>
          {content()}
        </DisableButton>
      );
    case 'transparent':
      return (
        <TransparentButton data-testid="transparent" className={className}>
          {content()}
        </TransparentButton>
      );
    case 'fill':
      return (
        <FillButton data-testid="fill" className={className}>
          {content()}
        </FillButton>
      );
    default:
      return (
        <FillButton data-testid="fill" className={className}>
          {content()}
        </FillButton>
      );
  }
};

export default Button;
