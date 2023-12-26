import { useEffect, useState } from 'react';

export default function useGetData( url: string ) {
	const [ data, setData ] = useState( [] );
	const [ isLoading, setIsLoading ] = useState( false );

	useEffect( () => {
		async function getData() {
			setIsLoading( true );
			try {
				const response = await fetch( url );
				const data = await response.json();
				if ( ! response.ok ) {
					throw new Error( `${ data.code }: ${ data.message }` );
				}
				setData( data );
			} catch ( err ) {
				console.error( err );
			} finally {
				setIsLoading( false );
			}
		}
		getData();
	}, [ url ] );

	return { data, isLoading };
}

// const initialQuery = `{
// 	podcastEpisodes(first: 100) {
// 	  pageInfo {
// 		hasNextPage
// 		startCursor
// 	  }
// 	  nodes {
// 		date
// 		featuredImage {
// 		  node {
// 			srcSet(size: MEDIUM)
// 			sourceUrl(size: MEDIUM)
// 		  }
// 		}
// 		title(format: RENDERED)
// 		uri
// 	  }
// 	}
//   }`;

// const initialQueryEncoded = encodeURIComponent( initialQuery );
