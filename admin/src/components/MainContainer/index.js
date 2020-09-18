import React from 'react';
import { Wrapper } from './styled';
import * as PropTypes from 'prop-types';

const MainContainer = ({ children }) => {
  return <Wrapper>{children ? children : 'Main container'}</Wrapper>;
};

MainContainer.propTypes = {
  children: PropTypes.node,
};

MainContainer.defaultProps = {
  children: null,
};

export default MainContainer;
