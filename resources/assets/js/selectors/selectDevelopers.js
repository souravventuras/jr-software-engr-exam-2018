import moment from 'moment';

export default (developers, {text, sortBy, startDate, endDate}) => {
    return developers.filter(developer => {
        const startDateMatch = startDate ? startDate.isSameOrBefore(moment(developer.created_at), 'day') : true;
        const endDateMatch = endDate ? endDate.isSameOrAfter(moment(developer.created_at), 'day') : true;
        const textMatch = developer.email.toLowerCase().includes(text.toLowerCase());

        return startDateMatch && endDateMatch && textMatch;
    }).sort((a, b) => {
        if(sortBy === 'date'){
          return a.created_at < b.created_at ? 1 : -1;
        }
    });
};