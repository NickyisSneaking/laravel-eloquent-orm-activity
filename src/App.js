import logo from './logo.svg';
import './App.css';
import Button from './component/Button';
import Card from './component/ui/Card';
import Counter from './component/ui/Counter';
import List from './component/ui/List';
import Post from './component/ui/Post';

//work on the counter component
function App() {
  return (
    <div className="App">
    <h1>Welcome to React</h1>
    <Button />
    <Card 
      name = "Card Name"
      description = "Card Description"
    />
    <Card
      name = "Jak"
      description = "Jak Description"
    />

      <div style={{ marginTop: '20px' }}>
        <h3>Interactive Counter:</h3>
        <Counter />
      </div>

      <div style={{ marginTop: '20px' }}>
        <h3>User List:</h3>
        <List />
      </div>

      <div style={{ marginTop: '20px' }}>
        <h3>Posts Feed:</h3>
        <Post />
      </div>
    </div>
  );
}

export default App;
