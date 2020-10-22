import styled from 'styled-components';
import colors from 'styles/colors';
import typography from 'styles/typography';

export const StyledContainer = styled.div`
  max-width: 328px;
`;

export const StyledTextArea = styled.textarea`
  padding: 5px;
  width: 300px;
  height: 100px;
  border: 1px solid ${colors.background.Neutral80};
`;

export const StyledLabel = styled.label`
  ${typography.body.M}
  color: ${colors.text.Neutral20};
  margin-bottom: 4px;
`;
