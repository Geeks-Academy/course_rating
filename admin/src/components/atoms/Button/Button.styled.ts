import styled from 'styled-components';
import typography from 'styles/typography';
import colors from 'styles/colors';

const BaseButton = styled.button`
  height: 52px;
  padding: 14px 24px;
  border-radius: 6px;
  border: none;
  outline: none;
  ${typography.body.bold.L}
  font-weight: 600;
  span {
    height: 24px;
    color: ${colors.text.Primary20};
  }
`;

export const FillButton = styled(BaseButton)`
  background-color: ${colors.background.Primary40};
  color: ${colors.text.Primary20};
`;

export const OutlineButton = styled(BaseButton)`
  background-color: ${colors.background.NeutralWhite};
  color: ${colors.text.Primary40};
  position: relative;
  padding: 14px 23px;
  border: 1px solid ${colors.text.Primary40};
  span {
    color: ${colors.text.Primary40};
  }
`;

export const DisableButton = styled(BaseButton)`
  background-color: ${colors.background.Neutral80};
  span {
    color: ${colors.background.Neutral40};
  }
`;

export const TransparentButton = styled(BaseButton)`
  background: transparent;
  span {
    color: ${colors.text.Primary40};
  }
`;
