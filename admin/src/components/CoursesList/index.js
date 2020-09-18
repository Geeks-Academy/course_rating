import React from 'react';
import { Wrapper } from './styled';
import * as PropTypes from 'prop-types';

const CoursesList = ({ items }) => (
  <Wrapper>
    <p>lista kursów</p>
    <ul>
      {items.map(({ name }) => (
        <li>{name}</li>
      ))}
    </ul>
  </Wrapper>
);

CoursesList.propTypes = {
  items: PropTypes.arrayOf(
    PropTypes.shape({
      name: PropTypes.string,
    })
  ),
};

CoursesList.defaultProps = {
  items: [],
};

export default CoursesList;
