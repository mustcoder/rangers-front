import React from 'react';
import {Spinner} from 'react-bootstrap';

const LoaderComponent = ({ animation, ourSize }) => {
    // border
    animation = animation || 'grow';
    ourSize = ourSize || 'lg';
    return <Spinner 
        animation={animation} size={ourSize} 
    />;
}

export default LoaderComponent;
