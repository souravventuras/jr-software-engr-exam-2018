const programmingLanguagesDefaultState = {};
export const programmingLanguagesReducer = (state = programmingLanguagesDefaultState, action) => {
  switch (action.type) {
    case 'SET_PROGRAMMING_LANGUAGES':
      return action.programming_languages;
    case 'SET_PROGRAMMING_LANGUAGES_DEVELOPER_ID':
      return action.programming_languages;
    default:
      return state;
  }
};