import React, {Component}  from 'react';
import ReactDOM from 'react-dom';
import Button from './Button';

 
export default class Example extends Component {
    render() {
    return (
        <div>
                 <Button />  
        </div>
           
        
    );
 }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
