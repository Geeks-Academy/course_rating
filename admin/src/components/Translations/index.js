import React from 'react';
import * as PropTypes from 'prop-types';
import { Wrapper } from './styled';

const Translations = ({ items }) => (
  <Wrapper>
    <p>tłumaczenia</p>
    <ul>
      {items.map(({ name }) => (
        <li>{name}</li>
      ))}
    </ul>
  </Wrapper>
);

Translations.propTypes = {
  items: PropTypes.arrayOf(
    PropTypes.shape({
      name: PropTypes.string,
    }),
  ),
};

Translations.defaultProps = {
  items: [],
};

export default Translations;
