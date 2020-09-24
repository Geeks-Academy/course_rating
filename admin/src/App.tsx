import React, { useState } from 'react';
import styled from 'styled-components';
import LeftMenu from './components/LeftMenu';
import MainContainer from './components/MainContainer';
import GlobalStyles from "./styles/GlobalStyles";


const Wrapper = styled.div`
  display: flex;
`;

const App = () => {
  const [currentComponent, setCurrentComponent] = useState<JSX.Element | null>(null);

  return (
    <Wrapper>
      <GlobalStyles />
      <LeftMenu setCurrentComponent={setCurrentComponent} />
      <MainContainer children={currentComponent} />
    </Wrapper>
  );
};

export default App;
