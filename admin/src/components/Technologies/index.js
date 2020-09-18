import React from 'react';
import * as PropTypes from 'prop-types';
import { Wrapper } from './styled';

const Technologies = ({ items }) => (
  <Wrapper>
    <ul>
      {items.map(({ name }) => (
        <li>{name}</li>
      ))}
    </ul>
  </Wrapper>
);

Technologies.propTypes = {
  items: PropTypes.arrayOf(
    PropTypes.shape({
      name: PropTypes.string,
    }),
  ),
};

Technologies.defaultProps = {
  items: [],
};

export default Technologies;
