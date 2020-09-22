import React from 'react';
import * as PropTypes from 'prop-types';
import { Wrapper } from './styled';

const Criteria = ({ items }) => (
  <Wrapper>
    <p>kryteria</p>
    <ul>
      {items.map(({ name }) => (
        <li>{name}</li>
      ))}
    </ul>
  </Wrapper>
);

Criteria.propTypes = {
  items: PropTypes.arrayOf(
    PropTypes.shape({
      name: PropTypes.string,
    }),
  ),
};

Criteria.defaultProps = {
  items: [],
};

export default Criteria;
