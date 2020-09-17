import React from 'react';
import LeftMenu from './components/LeftMenu';
import CoursesList from "./components/CoursesList";

const coursesList = [
    {
        name: 'Kurs 1'
    },
    {
        name: 'Kurs 2'
    },
    {
        name: 'Kurs 3'
    },
];

const App = () => (
  <div>
    <LeftMenu />
    <CoursesList items={coursesList} />
  </div>
);

export default App;
