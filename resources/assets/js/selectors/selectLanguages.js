import moment from 'moment';

export default (languages, {sortBy, startDate, endDate}) => {
    return languages.filter(language => {
        const startDateMatch = startDate ? startDate.isSameOrBefore(moment(language.created_at), 'day') : true;
        const endDateMatch = endDate ? endDate.isSameOrAfter(moment(language.created_at), 'day') : true;
        
        return startDateMatch && endDateMatch;
    }).sort((a, b) => {
        if(sortBy === 'date'){
          return a.created_at < b.created_at ? 1 : -1;
        }
    });
};