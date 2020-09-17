import React, { useState } from 'react';
import LeftMenu from './components/LeftMenu';
import MainContainer from './components/MainContainer';

const coursesList = [
  {
    name: 'Kurs 1',
  },
  {
    name: 'Kurs 2',
  },
  {
    name: 'Kurs 3',
  },
];

const App = () => {
  const [currentComponent, setCurrentComponent] = useState(null);

  return (
    <div>
      <LeftMenu />
      <MainContainer children={currentComponent} />
    </div>
  );
};

export default App;
