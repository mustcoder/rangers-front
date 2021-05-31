import appActionTypes from "../actions/app.actions";
import {initialGlobalState} from "../providers/app.provider";

export default (state, action) => {
  const {type, payload} = action;
  switch ( type ) {

    case appActionTypes.CHANGE_THEME_MODE:
      return {
        ...state, themeMode: payload.themeMode
      };

    case appActionTypes.SHOW_MODAL:
      const { title, body } = payload
      let items = [];
      if (payload['items']) items = payload['items'];
      return { ...state, modal: {
          show: true, title, body, items
        }
      };

    case appActionTypes.SET_NOTIFICATION:
      return setNotification(state, payload);

    case appActionTypes.UNSET_NOTIFICATION:
      return {...state, notification: initialGlobalState.notification};

    case appActionTypes.HIDE_MODAL:
      return {...state, modal: { show: false }};

    default:
      return state;
  }
}

// Change Language
const toggleLoader = (state, { isLoading } ) => {
  return { ...state,  showSpinner: isLoading };
};

// Set Notification
const setNotification = (state, { message, type } ) => {
  if (typeof type === 'undefined') type = 'danger';
  return { ...state, notification: { message, type, hasNotification: true } }
};

