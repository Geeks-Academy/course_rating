import React from 'react';
import { Container } from './ExampleStorybook.styled';
import { IExampleStorybook } from './ExampleStorybook.model';

const ExampleStorybook = ({ border }: IExampleStorybook): JSX.Element => (
  <Container border={border}>
    <p>example storybook</p>
  </Container>
);

export default ExampleStorybook;
