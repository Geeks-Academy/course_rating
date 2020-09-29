import styled from 'styled-components';

export const Container = styled.div<{ border: boolean }>`
  background-color: rosybrown;
  color: #fff;
  padding: 10px;
  border: ${({ border }) => (border ? `2px solid #000` : `none`)};
`;
