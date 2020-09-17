import React from 'react';
import { Wrapper } from './styled';
import * as PropTypes from 'prop-types';

const MainContainer = ({ props }) => {
  const { children } = props;

  return <Wrapper>{children ? children : 'Main component'}</Wrapper>;
};

MainContainer.propTypes = {
  children: PropTypes.node,
};

MainContainer.defaultProps = {
  children: null,
};

export default MainContainer;
