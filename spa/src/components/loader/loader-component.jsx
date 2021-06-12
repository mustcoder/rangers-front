import React from 'react';
import {Spinner} from 'react-bootstrap';

const LoaderComponent = ({ animation, variant, ourSize }) => {
    // border
    animation = animation || 'border';
    variant = variant || 'success';
    ourSize = ourSize || 'lg';
    return <Spinner 
        animation={animation} size={ourSize} variant={variant}
    />;
}

export default LoaderComponent;
