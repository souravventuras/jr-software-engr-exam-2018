const developersReducerDefaultState = {};
export const developersReducer = (state = developersReducerDefaultState, action) => {
  switch (action.type) {
    case 'SET_DEVELOPERS':
      return action.developers;
    default:
      return state;
  }
};