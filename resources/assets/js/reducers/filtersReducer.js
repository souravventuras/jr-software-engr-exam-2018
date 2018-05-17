const filtersReducerDefaultState = {
  text: '',
  programmingSearchText: '',
  languageSearchText: '',
  text: '',
  sortBy: 'date',
  startDate: undefined,
  endDate: undefined
};

export const filtersReducer = (state = filtersReducerDefaultState, action) => {
  switch (action.type) {
    case 'SET_TEXT_FILTER':
      return {
        ...state,
        text: action.text
      };
    case 'SET_PROGRAMMING_TEXT_FILTER':
      return {
        ...state,
        programmingSearchText: action.text
      };
    case 'SET_LANGUAGE_TEXT_FILTER':
      return {
        ...state,
        languageSearchText: action.text
      };
    case 'SORT_BY_DATE':
      return {
        ...state,
        sortBy: 'date'
      };
    case 'SET_START_DATE':
      return {
        ...state,
        startDate: action.date
      };
    case 'SET_END_DATE':
      return {
        ...state,
        endDate: action.date
      };
    default:
      return state;
  };
};