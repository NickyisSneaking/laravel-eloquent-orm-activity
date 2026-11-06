import { useState, useEffect } from 'react';
import axios from 'axios';

export default function List() {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        const response = await axios.get('https://jsonplaceholder.typicode.com/users');
        const data = response.data;
        
        setUsers(data);
        setLoading(false); // FIXED: Stops the loading screen when data successfully arrives!
      } catch (error) {
        console.error('Error fetching users:', error);
        setLoading(false); // Keeps the app from freezing on loading if it fails
      }
    };
    
    fetchUsers();
  }, []); // Run once on mount

  if (loading) {
    return <p>Loading...</p>;
  }

  //add loop
  return (
    <ul>
      {users.map(user => (
        <li key={user.id}>{user.name}</li>
      ))}
    </ul>
  );
}
