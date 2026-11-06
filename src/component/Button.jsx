function Button() {
 const handleClick  = () =>{
  alert('Button Clicked');
}
return <button type="button" onClick={handleClick}>Stupid code!</button>;

}

export default Button;
