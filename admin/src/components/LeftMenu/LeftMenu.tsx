import React from 'react';
import CoursesList from '../CoursesList';
import Reminders from '../Reminders';
import Criteria from '../Criteria';
import Technologies from '../Technologies';
import Translations from '../Translations';
import { Wrapper } from './LeftMenu.styled';
import { ILeftMenu } from './LeftMenu.model';

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

const menuItems = [
  {
    name: 'Lista kursów',
    component: <CoursesList items={coursesList} />,
  },
  {
    name: 'Przypomnienia',
    component: <Reminders />,
  },
  {
    name: 'Kryteria',
    component: <Criteria />,
  },
  {
    name: 'Technologie',
    component: <Technologies />,
  },
  {
    name: 'Tłumaczenia',
    component: <Translations />,
  },
];

const LeftMenu = ({ setCurrentComponent }: ILeftMenu): JSX.Element => (
  <Wrapper>
    <ul>
      {menuItems.map((item) => (
        <li onClick={() => setCurrentComponent(item.component)}>{item.name}</li>
      ))}
    </ul>
  </Wrapper>
);

export default LeftMenu;
