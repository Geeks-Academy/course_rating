import { createGlobalStyle } from 'styled-components';

const GlobalStyles = createGlobalStyle`
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
