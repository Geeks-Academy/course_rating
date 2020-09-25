import { createGlobalStyle } from 'styled-components';
import typography from './typography';


const GlobalStyles = createGlobalStyle`
    * {
        ${typography.globalStyles};
    }
    *, *::before, *::after {
        box-sizing: border-box;
    }
    body{
        margin: 0;
    }
    html {
        box-sizing: border-box;
        overflow-y: scroll;
  }
`;

export default GlobalStyles;
