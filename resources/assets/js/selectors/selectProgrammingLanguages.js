import moment from 'moment';

export default (programming_languages, {text, sortBy, startDate, endDate}) => {
    return programming_languages.filter(programming_language => {
        const startDateMatch = startDate ? startDate.isSameOrBefore(moment(programming_language.created_at), 'day') : true;
        const endDateMatch = endDate ? endDate.isSameOrAfter(moment(programming_language.created_at), 'day') : true;
        const textMatch = programming_language.name.toLowerCase().includes(text.toLowerCase());

        return startDateMatch && endDateMatch && textMatch;
    }).sort((a, b) => {
        if(sortBy === 'date'){
          return a.created_at < b.created_at ? 1 : -1;
        }
    });
};