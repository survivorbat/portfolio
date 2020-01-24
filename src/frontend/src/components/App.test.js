import React from 'react';
import { render } from '@testing-library/react';
import App from './App';

test('it renders', () => {
    // Assert
    const component = render(<App />);

    // Act
    expect(component).toBeTruthy();
});
