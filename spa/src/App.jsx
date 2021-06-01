import {
  BrowserRouter as Router, Switch, Route
} from 'react-router-dom';
import {AppProvider} from './context/providers/app.provider';

import PrimaryNavigationComponent from './components/primary-navigation/primary-navigation.component.jsx';
import HomePage from './pages/home.page.jsx';
import AboutPage from './pages/about.page.jsx';
import ProfilPage from './pages/profil.page.jsx';
import logo from './logo.svg';
import './App.css';

const AppComponent = () => {
//  const name = props.name + "-2"; const age = props.age + "-2";

  return (
    <Router>
      <AppProvider>
        <div>
          <PrimaryNavigationComponent />
          <Switch>
            <Route path="/profil" >
              <ProfilPage />
            </Route>
            <Route path="/about" >
              <AboutPage />
            </Route>
            <Route path="/">
              <HomePage />
            </Route>            
          </Switch>
        </div>
      </AppProvider>
    </Router>
  );
}

// function App() {
//   return (
//   );
// }

export default AppComponent;
