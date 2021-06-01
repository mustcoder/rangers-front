import React, {useEffect, Fragment} from 'react';

import {useAppContext, appActionTypes} from '../context/providers/app.provider';

const ProfilPage = () => {
    const [appState, appDispatch] = useAppContext();
    const {themeMode} = appState;

    useEffect(() => {
        console.log("Profil pae mounted");
        return () => {
            console.log("Profil pae UNmounted!!!");
        }
    }, []);

    const handleChangeTheme = (ev) => {
        appDispatch({
            type: appActionTypes.CHANGE_THEME_MODE,
            payload: {
                themeMode: (themeMode == 'yellow' ? 'blue' : 'yellow')
            }
        });
    }

    return (
        <Fragment>
            <h2>Tis is Profil Pae</h2>
            <h5>Our Teme is {themeMode}</h5>
            <button onClick={handleChangeTheme}>
                Cane Teme Mode
            </button>
        </Fragment>
    );
}

export default ProfilPage;