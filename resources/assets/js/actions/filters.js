export const setTextFilter = (text = '') => ({
    type: 'SET_TEXT_FILTER',
    text
});

export const sortByDate = () => ({
    type: 'SORT_BY_DATE'
});

export const setStartDate = (data = undefined) => ({
    type: 'SET_START_DATE',
    date
});

export const setEndDate = (data = undefined) => ({
    type: 'SET_END_DATE',
    date
});