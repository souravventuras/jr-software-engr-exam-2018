const languagesReducerDefaultState = {};
export const languagesReducer = (state = languagesReducerDefaultState, action) => {
  switch (action.type) {
    case 'SET_LANGUAGES':
      return action.languages;
    default:
      return state;
  }
};