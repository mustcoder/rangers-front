const appActionTypes = {
  APP_TOGGLE_LOADER: 'APP_TOGGLE_LOADER',
  SET_NOTIFICATION: 'SET_NOTIFICATION',
  UNSET_NOTIFICATION: 'UNSET_NOTIFICATION',

  SHOW_MODAL: 'SHOW_MODAL',
  HIDE_MODAL: 'HIDE_MODAL',

  setNotification: (dispatch, payload) => {
    appActionTypes.unSetNotification(dispatch);
    dispatch({ type: appActionTypes.SET_NOTIFICATION, payload });
  },

  unSetNotification: (dispatch) => {
    dispatch({ type: appActionTypes.UNSET_NOTIFICATION });
  },
  showModal: (dispatch, payload) => showModal(dispatch, payload),
  hideModal: (dispatch) => hideModal(dispatch),
  toggleLoader: (dispatch, payload) => dispatch({ type: appActionTypes.APP_TOGGLE_LOADER, payload })
};


// APP LEVEL ACTIONS
export const hideModal = dispatch => dispatch({
  type: appActionTypes.HIDE_MODAL
});

export const showModal = (dispatch, payload) => dispatch({
  type: appActionTypes.SHOW_MODAL,
  payload
});


export default appActionTypes;
