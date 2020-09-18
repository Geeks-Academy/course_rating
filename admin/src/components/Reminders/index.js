import React from 'react';
import * as PropTypes from 'prop-types';
import { Wrapper } from './styled';

const Reminders = ({ items }) => (
  <Wrapper>
    <ul>
      {items.map(({ name }) => (
        <li>{name}</li>
      ))}
    </ul>
  </Wrapper>
);

Reminders.propTypes = {
  items: PropTypes.arrayOf(
    PropTypes.shape({
      name: PropTypes.string,
    }),
  ),
};

Reminders.defaultProps = {
  items: [],
};

export default Reminders;
