import React from 'react';
import styled from 'styled-components';
import GlobalStyles from './styles/GlobalStyles';

const Wrapper = styled.div`
  display: flex;
`;

function App(): JSX.Element {
  return (
    <Wrapper>
      <GlobalStyles />
      <h1>Admin Panel</h1>
    </Wrapper>
  );
}

export default App;
