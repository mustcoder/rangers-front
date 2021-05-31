import React, {useEffect, useRef} from 'react';

const AboutPage = () => {
    const [ourColor, setOurColor] = React.useState ('yellow');
    const [ourPadding, setOurPadding] = React.useState ('40px');

    useEffect(() => {
        console.log ('Mounted');
        return () => {
            console.log('Unmounted!!!');
        }
    }, []);

    useEffect(() => {
        console.log("Updated", ourColor, ourPadding);
    },  [ourColor,ourPadding]);

    console.log('Re-rendered');

    const handleButtonClick = (ev) => {
        setOurColor(ourColor == 'black' ? 'yellow' : 'black');
        setOurPadding(ourPadding === '200px' ? '40px' : '200px')
    }

    return (
        <div>
            <h1>This is
                <span style={
                    {
                        color: ourColor,
                        paddingLeft: ourPadding,
                        minWidth: '35px'
                    }
                }>About Page</span>
            </h1>
            <button onClick={handleButtonClick}>Click to me!!!</button>    
        </div>
    );
}

export default AboutPage;
