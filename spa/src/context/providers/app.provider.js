import React, { createContext, useContext, useEffect, useMemo, useReducer } from "react";
// import moment from 'moment';

// import { APP_STATE_KEY, LOCALE } from '../../config';
import appReducer from "../reducers/app.reducer";
import appActionTypes  from "../actions/app.actions";
// import { getStorageKey, saveStorageKey } from '@utils/localStore';

// export const initialGlobalState = {
//   locale: LOCALE,
//   showSpinner: false,
//   notification: { hasNotification: false, message: '', type: 'danger' },
//   validTill: moment().add(15, 'minutes')
// };

export const initialGlobalState = {
  user: {
    'name': 'Elman',
    'age': 45
  }
}

// const localAppState = getStorageKey(APP_STATE_KEY);
// const AppContext = createContext(localAppState || initialGlobalState);

const AppContext = createContext(initialGlobalState);

const AppProvider = ({ children }) => {
  // const [appState, dispatch] = useReducer(appReducer, localAppState || initialGlobalState);
  const [appState, dispatch] = useReducer(appReducer, initialGlobalState);

  // if (!appState.validTill || moment(appState.validTill).isBefore()) {
  //   // appReducer(appState, {
  //   //     type: appActionTypes.GET_INITIAL_DATA
  //   // });
  // }

  // useEffect(() => {
  //   saveStorageKey(APP_STATE_KEY, appState);
  // }, [appState]);


  const value = useMemo(() => [appState, dispatch], [appState]);

  return(
    <AppContext.Provider value={value}>
      {children}
    </AppContext.Provider>
  );
};

const useAppContext = () => {
  const context = useContext(AppContext);
  if (!context) {
    throw new Error(`useApp must be used within a AppContext`);
  }
  return context;
};


export { AppContext, AppProvider, useAppContext, appActionTypes };

