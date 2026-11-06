import {useState} from 'react';

export default function Form() 
{
    //useState is a hook that allows us to add state to functional components. It returns an array with two elements: the current state value and a function to update it.
    const [name, setName] = useState("");
    
//event handler for the input field. It updates the state with the current value of the input field whenever the user types something.
function handleSubmit(e) {
e.preventDefault();
console.log(name);
}
    return (
        <form method="POSTS" onSubmit={handleSubmit}>
        <input
        value={name}
        onChange={(e) => setName(e.target.value)}
        placeholder="Enter your name"
        />
        <button>Submit</button>
        </form>
    )
}